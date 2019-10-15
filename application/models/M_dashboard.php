<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function getAllPendingApplicants($employer_code, $company_code)
    {
        return $this->db->select('jp.*, a.*, ja.*, j.*, a.status applied_status, jf.path document_path')
            ->from('job_post jp')
            ->join('job_applied a', 'jp.job_code = a.job_code', 'LEFT')
            ->join('jobseeker_account ja', 'a.jobseeker_code = ja.jobseeker_code', 'LEFT')
            ->join('jobseeker j', 'ja.jobseeker_id = j.id', 'LEFT')
            ->join('(
                SELECT path, jobseeker_code
                FROM jobseeker_files
                WHERE file_type_code = "RES"
            ) jf', 'ja.jobseeker_code = jf.jobseeker_code', 'LEFT')
            ->group_by('a.job_code')
            ->order_by('a.date_applied', 'DESC')
            ->where('jp.employer_code', $employer_code)
            ->where('jp.company_code', $company_code)
            ->where('a.status', '0')
            ->get();
    }

    function getAllPendingApplicantsWithoutSession($employer_code, $company_code)
    {
        return $this->db->select('jar.*, jp.*')
            ->from('job_applied_request jar')
            ->join('job_post jp', 'jar.job_code = jp.job_code')
            ->group_by('jar.job_code')
            ->where('jp.employer_code', $employer_code)
            ->where('jp.company_code', $company_code)
            ->get();
    }

    function hireApplicant($jobseeker_code, $job_code)
    {
        $this->db->where('jobseeker_code', $jobseeker_code)->where('job_code', $job_code)->set('status', 1)->update('job_applied');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function failedApplicant($jobseeker_code, $job_code)
    {
        $this->db->where('jobseeker_code', $jobseeker_code)->where('job_code', $job_code)->set('status', 3)->update('job_applied');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getJobseekerInformation($jobseeker_code = null)
    {
        $this->db->select('a.*, ja.*, j.*, p.description city, r.description region, g.description gender, cs.description civil_status, dr.description religion, n.description nationality, jp.*, jw.*, js.*, jf.path');
        $this->db->from('jobseeker_account ja');
        $this->db->join('jobseeker j', 'ja.jobseeker_id = j.id', 'LEFT');
        $this->db->join('jobseeker_preference jp', 'ja.jobseeker_code = jp.jobseeker_code', 'LEFT');
        $this->db->join('jobseeker_work jw', 'ja.jobseeker_code = jw.jobseeker_code', 'LEFT');
        $this->db->join('jobseeker_school js', 'ja.jobseeker_code = js.jobseeker_code', 'LEFT');
        $this->db->join('d_province p', 'j.city = p.id', 'LEFT');
        $this->db->join('d_region r', 'j.region = r.id', 'LEFT');
        $this->db->join('d_gender g', 'j.gender = g.id', 'LEFT');
        $this->db->join('d_civil_status cs', 'j.civil_status = cs.id', 'LEFT');
        $this->db->join('d_nationality n', 'j.nationality = n.id', 'LEFT');
        $this->db->join('d_religion dr', 'j.religion = dr.id', 'LEFT');
        $this->db->join('job_applied a', 'ja.jobseeker_code = a.jobseeker_code', 'LEFT');
        $this->db->join('(
                SELECT path, jobseeker_code
                FROM jobseeker_files
                WHERE file_type_code = "US"
            ) jf', 'ja.jobseeker_code = jf.jobseeker_code', 'LEFT');
        if ($jobseeker_code != null) {
            $this->db->where('ja.jobseeker_code', $jobseeker_code);
        }
        return $this->db->get();
    }

    function jobseeker_applied($jobseeker_code)
    {
        return $this->db->select()
            ->from('job_applied ja')
            ->join('job_post jp', 'ja.job_code = jp.job_code', 'LEFT')
            ->join('employer_company ec', 'jp.company_code = ec.company_code', 'LEFT')
            ->where('ja.jobseeker_code', $jobseeker_code)
            ->get();
    }

    function countAppliedJobs($jobseeker_code)
    {
        return $this->db->where('jobseeker_code', $jobseeker_code)->count_all_results('job_applied');
    }

    function getHighestCity()
    {
        $cities = $this->db->get('d_province')->result_array();
        $employer_code = $this->session->userdata('employer_code');
        $employer_code = $this->global->ecdc('decrypt', $employer_code);

        $city_highest = [];
        arsort($city_highest);
        array_slice($city_highest, 0, 5);
        foreach ($cities as $city) {

            $total_city = $this->db->query('SELECT COUNT(*) total_city FROM (SELECT ja1.* FROM job_applied ja1 RIGHT JOIN job_post jp ON ja1.job_code = jp.job_code WHERE jp.employer_code ="' . $employer_code . '" GROUP BY ja1.jobseeker_code) ja JOIN (SELECT j.*, ja.jobseeker_code FROM jobseeker_account ja JOIN jobseeker j ON ja.jobseeker_id = j.id) jac ON ja.jobseeker_code = jac.jobseeker_code WHERE jac.city = "' . $city['id'] . '"')->row_array();

            if ($total_city['total_city'] != 0) {
                $data = [
                    'total_city' => $total_city['total_city'],
                    'city_name' => $city['description'],
                ];

                array_push($city_highest, $data);
            }
        }

        return $city_highest;
    }

    function getTotalJobApplied()
    {
        $employer_code = $this->session->userdata('employer_code');
        $employer_code = $this->global->ecdc('decrypt', $employer_code);

        $employer_jobs = $this->db->select('ja.*, jp.job_title')
            ->from('job_applied ja')
            ->join('job_post jp', 'ja.job_code = jp.job_code')
            ->where('jp.employer_code', $employer_code)
            ->group_by('ja.job_code')
            ->get();

        $ChartJobs = [];
        arsort($ChartJobs);
        array_slice($ChartJobs,0,6);

        foreach ($employer_jobs->result_array() as $job) {
            $total_jobs = $this->db->where('job_code', $job['job_code'])->count_all_results('job_applied');

            $data = [
                'total_jobseekers' => $total_jobs,
                'job_name' => $job['job_title'],
            ];

            array_push($ChartJobs, $data);
        }

        return $ChartJobs;
    }
}

/* End of file M_dashboard.php */

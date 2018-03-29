<?php
class GetData extends CI_controller
{
    public function getRawData($a_id)
    {
        $sql = "SELECT * FROM raw_data WHERE a_id = ?";
        $query = $this->db->query($sql,array($a_id));
        return $query;
    }

    public function getTaskList($a_id,$date)
    {
        $sql = "SELECT * FROM task WHERE a_id = ? AND t_date = ?";
        $query = $this->db->query($sql,array($a_id,$date));
        return $query;
    }

    public function getDataByTask($task_id)
    {
        $beginSql = "SELECT d_id FROM raw_data, task WHERE task.t_id = ? AND raw_data.date = task.t_date AND raw_data.time = task.t_start_time";
        $endSql = "SELECT d_id FROM raw_data, task WHERE task.t_id = ? AND raw_data.date = task.t_date AND raw_data.time = task.t_end_time";
        $beginID = $this->db->query($beginSql,array($task_id));
        $endID = $this->db->query($endSql,array($task_id));
        $sql = "SELECT * FROM raw_data WHERE d_id>=? AND d_id<=?";
        $query = $this->db->query($sql,array($beginID,$endID));
        return $query;
    }

    public function getAircraftList()
    {
        $sql = "SELECT * FROM aircraft";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getAirCraftById($a_id)
    {
        $sql = "SELECT * FROM aircraft WHERE a_id = ?";
        $query = $this->db->query($sql,array($a_id));
        return $query;
    }

}
<?php 
class Writedata extends CI_Controller{
    public function write($a_id,$date,$time,$latitude,$longitude,$pressure,$heading,$poll_1,$poll_2,$poll_3,$poll_4,$poll_5,$photo_id)
    {
         $this->load->database();
        $data = array(
            'a_id' => $a_id,
            'date' => $date,
            'time' => $time,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'pressure' => $pressure,
            'heading' => $heading,
            'poll_1' => $poll_1,
            'poll_2' => $poll_2,
            'poll_3' => $poll_3,
            'poll_4' => $poll_4,
            'poll_5' => $poll_5,
            'photo_id' => $photo_id
        );
        $this->db->insert('raw_data',$data);
        echo 'These data is inserted to raw_data table successfully.<br/>';
        echo 'a_id '.$a_id.'<br/>';
        echo 'date'.$date.'<br/>';
        echo 'time'.$time."<br/>";
        echo 'latitude '.$latitude.'<br/>';
        echo 'longitude '.$longitude.'<br/>';
        echo 'pressure '.$pressure.'</br>';
        echo 'heading '.$heading.'<br/>';
        echo 'pollution 1 '.$poll_1.'<br/>';
        echo 'pollution 2 '.$poll_2.'<br/>';
        echo 'pollution 3 '.$poll_3.'<br/>';
        echo 'pollution 4 '.$poll_4.'<br/>';
        echo 'pollution 5 '.$poll_5.'<br/>';
        echo 'photo id '.$photo_id.'<br/>';
       
    }
}
?>
<?php


class Badword_model  extends CI_Model {

	function __construct() {
		parent::__construct ();
		$this->load->database ();
	}


    function get_list($start=0,$limit=20){
        $wordlist = array();
        $query = $this->db->query("SELECT * FROM ".$this->db->dbprefix."badword  ORDER BY `id` DESC LIMIT $start,$limit");
        foreach ( $query->result_array () as $word ) {
            $wordlist[] = $word;
        }
        return $wordlist;
    }
    function add($wids,$finds,$replacements,$admin){
        $wsize = count($wids);
        for($i=0;$i<$wsize;$i++){
            if($wids[$i]){
            	$this->db->set(array('find'=>$finds[$i],'replacement'=>$replacements[$i]))->where(array('id'=>$wids[$i]))->update('badword');
            }else{
            	if($finds[$i] ){
            		$this->db->insert('badword',array('admin'=>$admin,'find'=>$finds[$i],'replacement'=>$replacements[$i]));
            	}
            }
        }
    }

    function multiadd($lines,$admin){
        $sql = "INSERT INTO `".$this->db->dbprefix."badword`(`admin` ,`find` , `replacement`) VALUES ";
        foreach ($lines as $line){
            $line=str_replace(array("\r\n", "\n", "\r"), '', $line);
            if(empty($line))continue;
            @list($find,$replacement)=explode('=' , $line);
            $sql .= "('$admin','$find', '$replacement'),";
        }
        $sql=substr($sql,0,-1);
        $this->db->query($sql);
    }

    function remove_by_id($ids){
    	$this->db->where_in('id',explode(',', $ids))->delete('badword');
    }

}
?>
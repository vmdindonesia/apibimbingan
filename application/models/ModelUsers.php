<?php
class ModelUsers extends CI_Model {
    function checkLogin($username,$password){
        $sql    = "SELECT
        a.username,
        a.`password`,
        a.fullname,
        a.jurusan,
        a.no_telpon,
        a.jenis_kelamin,
        a.alamat,
        a.permission,
        b.jurusan_id,
        b.jurusan_name
        FROM
        users AS a
        LEFT JOIN jurusan AS b ON a.jurusan = b.jurusan_id
        WHERE
        a.username = ? AND a.password = ?
        ";
        $query  = $this->db->query($sql, array($username,$password));
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
}
?>
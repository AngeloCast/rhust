<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Cluster_model extends Model{
	
	public function get_male($barangay)
	{
		return $this->db->table('tblpatientrecords')->select_count('*', 'mrow')->where('address', $barangay)->where('gender', 'M')->get();
	}

	public function get_female($barangay)
	{
		return $this->db->table('tblpatientrecords')->select_count('*', 'frow')->where('address', $barangay)->where('gender', 'F')->get();
	}

	public function get_other($barangay)
	{
		return $this->db->table('tblpatientrecords')->select_count('*', 'orow')->where('address', $barangay)->where('gender', 'O')->get();
	}

  public function get_malesakit($barangay, $sakit){
    return $this->db->table('tblpatientrecords')->select_count('*', 'mrow')->where('address', $barangay)->where('gender', 'M')->where('classification', $sakit)->get();
  }

  public function get_femalesakit($barangay, $sakit){
    return $this->db->table('tblpatientrecords')->select_count('*', 'frow')->where('address', $barangay)->where('gender', 'F')->where('classification', $sakit)->get();
  }

  public function get_othersakit($barangay, $sakit){
    return $this->db->table('tblpatientrecords')->select_count('*', 'orow')->where('address', $barangay)->where('gender', 'O')->where('classification', $sakit)->get();
  }

	public function get_classification($barangay)
	{
		return $this->db->raw("SELECT classification AS patientClass, COUNT(id) AS numPerPatient FROM `tblpatientrecords` WHERE address='$barangay' AND address IS NOT NULL GROUP BY classification");
	}
  
	public function get_age($name){
        return $this->db->raw("SELECT 
              IF(age BETWEEN 0 AND 14, '0-14',
                IF(age BETWEEN 15 AND 24, '15-24',
                    IF(age BETWEEN 25 AND 44, '25-44',
                        IF(age BETWEEN 45 AND 64, '45-64',
                            IF(age BETWEEN 65 AND 74, '65-74',
                                IF(age >= 75, '75-80+', '')
                                )
                            )
                        )
                    )
                ) AS patientAge,
              SUM(1) AS numPerPatient
            FROM 
              tblpatientrecords
            WHERE
                address='$name'
            GROUP BY 
              patientAge
            ORDER BY 
              patientAge;");
    }

    public function get_agesakit($name, $sakit){
      return $this->db->raw("SELECT 
            IF(age BETWEEN 0 AND 14, '0-14',
              IF(age BETWEEN 15 AND 24, '15-24',
                  IF(age BETWEEN 25 AND 44, '25-44',
                      IF(age BETWEEN 45 AND 64, '45-64',
                          IF(age BETWEEN 65 AND 74, '65-74',
                              IF(age >= 75, '75-80+', '')
                              )
                          )
                      )
                  )
              ) AS patientAge,
            SUM(1) AS numPerPatient
          FROM 
            tblpatientrecords
          WHERE
            address='$name'
              AND
            classification='$sakit'  
          GROUP BY 
            patientAge
          ORDER BY 
            patientAge;");
  }

}
?>
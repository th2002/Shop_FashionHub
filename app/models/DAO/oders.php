<?php 

// truy vấn thành phố 
    function thanh_pho_select_all() {
        $sql = "SELECT id, _name FROM province";
        return  pdo_query($sql);
    }
//truy vấn quận theo thành phố
    function quan_select_by_id_thanh_pho($selectedCityId) {
        $sql= "SELECT * FROM district WHERE _province_id = $selectedCityId";
        return  pdo_query($sql);
    }

// truy vấn xã theo quận và thành phố
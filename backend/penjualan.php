<?php
    include_once 'koneksi.php';

    class Data_Aktual{
        public $no_data, $pengiklanan, $penjualan, $estimasi;
        private $connection;

        function __construct($no_data, $pengiklanan, $penjualan){
            $database = new Database();
            $this->connection = $database->connect();

            $this->no_data = $no_data;
            $this->pengiklanan = $pengiklanan;
            $this->penjualan = $penjualan;
        }


        public static function readAllData(){
            $arrayData_Aktual = array(); // Menampung seluruh record yang dipanggil

            $query = "SELECT * FROM data_aktual"; 
            $database = new Database();
            $connection = $database->connect();
            $result = $connection->query($query) or die($connection->error);

            // While untuk mengambil object hasil query, lalu mengubahnya menjadi array
            // untuk disimpan dalam variabel arrayPenjualan.
            while ($row=$result->fetch_assoc()){    
                $data_aktual = new Data_Aktual(
                    $row['no_data'],
                    $row['pengiklanan'],
                    $row['penjualan']
                );

                // Memasukkan tiap-tiap record sebagai objek ke variabel array.
                $arrayData_Aktual[$data_aktual->no_data] = $data_aktual;
            }

            return $arrayData_Aktual;
        }

        public function readSpecificData($no_data){
            $query = "SELECT * FROM data_aktual WHERE no_data = $no_data";
            $result = $this->connection->query($query) or die($this->connection->error);

            $row = $result->fetch_assoc();
            $this->no_data = $row['no_data'];
            $this->pengiklanan = $row['pengiklanan'];
            $this->penjualan = $row['penjualan'];
            return $result;
        }
    }

?>
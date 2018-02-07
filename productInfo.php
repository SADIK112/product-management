<?php

    class Product{
        
        protected $connection;
        
        public function __construct(){
            
            $host_name = 'localhost';
            $user_name = 'root';
            $password = '';
            $db_name = 'db_product_info';
            
            $this->connection = mysqli_connect($host_name , $user_name , $password , $db_name);
            
            if(!$this->connection){
                die('connection failed'.mysqli_error($this->connection));
            }
        }
        
        public function save_product_info($data){
        
            $sql = "INSERT INTO tbl_product (product_name , product_price , product_quantity , product_category , product_description)"."VALUES('$data[product_name]' , '$data[product_price]' , '$data[product_quantity]' , '$data[product_category]' , '$data[product_description]')";
            
            if(mysqli_query($this->connection , $sql)) {
                $message = "Product Info Save Succesfully";
                return $message;
            }
            else{
                die('query failed'.mysqli_error($this->connection));
            }
        }
        
        public function select_all_product_info(){
            
            $sql = "SELECT * FROM tbl_product";
                
            if(mysqli_query($this->connection , $sql)) {
                $query_result = mysqli_query($this->connection , $sql);
                return $query_result; 
            }
            else{
                die('query failed'.mysqli_error($this->connection));
            }
        }
        
        public function  select_product_info_by_id($product_id){
            
            $sql = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
                
            if(mysqli_query($this->connection , $sql)) {
                $query_result = mysqli_query($this->connection , $sql);
                return $query_result; 
            }
            else{
                die('query failed'.mysqli_error($this->connection));
            }
        }
        
        public function update_product_info($data){
            
            $sql = "UPDATE tbl_product SET product_name = '$data[product_name]' , product_price = '$data[product_price]' , product_quantity = '$data[product_quantity]' , product_category = '$data[product_category]' , product_description = '$data[product_description]' WHERE product_id = '$data[product_id]'";
            
               if(mysqli_query($this->connection , $sql)) {
                session_start();
                $_SESSION['message'] = 'Student Info Updated Successfully';
                header('Location: view_product.php');
            }
            else{
                die('query failed'.mysqli_error($this->connection));
            }
        }
        
        public function delete_product_info($id){
            
            $sql = "DELETE FROM tbl_product WHERE product_id = '$id'";
            
              if(mysqli_query($this->connection , $sql)) {
                $message = 'Student info Delete Successfully';
                return $message;
            }
            else{
                die('query failed'.mysqli_error($this->connection));
            }
        }
    }

?>
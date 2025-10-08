<?php
    define(__DIR__,"BASEURL");
    class db{
        public $mysqli;
        public $query;

        function __construct(){
            $this->mysqli = new mysqli("localhost","root","","movie") or die("ERROR404");
            mysqli_query($this->mysqli,"SET NAMES UTF8");
            date_default_timezone_set("Asia/Bangkok");
        }

        public function insert($table,$parems = []){
            $key = implode(",",array_keys($parems));
            $val = implode("','",$parems);
            $sql = "INSERT INTO $table($key) VALUES ('$val')";
            $this->query = $this->mysqli->query($sql);
        }
        public function insertwhere($table,$parems = [],$where){
            $key = implode(",",array_keys($parems));
            $val = implode("','",$parems);
            $sql = "INSERT INTO $table($key) SELECT '$val' WHERE NOT EXISTS $where";
            $this->query = $this->mysqli->query($sql);
            $rowinsert = $this->mysqli->affected_rows;
            return $rowinsert;
        }

        public function select($table,$row = "*",$where = null){
            $sql = $where != null ? "SELECT $row FROM $table WHERE $where" : "SELECT $row FROM $table";
            $this->query = $this->mysqli->query($sql);
        }

        public function update($table,$parems = [],$id){
            $args = [];
            foreach($parems as $key => $val){
                $args[] = "$key = '$val'";
            }
            $sql = "UPDATE $table SET " .implode(",",$args);
            $sql .= " WHERE $id";
            $this->query = $this->mysqli->query($sql);
        }

        public function checklogin(){
            if(!isset($_SESSION['userid'])){
                header('location:./../index.php?check=false');
            }
        }
        public function loadalert(){
            if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php }
            if(isset($_SESSION['error'])){ ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php }
            if(isset($_SESSION['warning'])){ ?>
                <div class="alert alert-warning alert-dismissible show fade">
                    <?= $_SESSION['warning']; unset($_SESSION['warning']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php }
        }

        public function uploadimg($file){
            $e = explode(".",$file['name']);
            $ex = strtolower(end($e));
            $ne = rand() . "." . $ex;
            $pa = "./../movie_img/" . $ne;
            move_uploaded_file($file['tmp_name'],$pa);
            return($ne);
        }
        public function uploadimg2($file){
            $e = explode(".",$file['name']);
            $ex = strtolower(end($e));
            $ne = rand() . "." . $ex;
            $pa = "./../../img/" . $ne;
            move_uploaded_file($file['tmp_name'],$pa);
            return($ne);
        }

        public function uploadimgout($file){
            $e = explode(".",$file['name']);
            $ex = strtolower(end($e));
            $ne = rand() . "." . $ex;
            $pa = "./img/" . $ne;
            move_uploaded_file($file['tmp_name'],$pa);
            return($ne);
        }

        public function setalert($key,$val){
            $_SESSION[$key] = "$val";
            header('location:'.$_SERVER['REQUEST_URI']);
        }
        public function delete($table,$id){
            $sql = "DELETE FROM $table ";
            $sql .= " WHERE $id";
            $this->query = $this->mysqli->query($sql);
        }
    }

    $conn = mysqli_connect($l="localhost",$r="root",$p="",$db="movie");
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
?>
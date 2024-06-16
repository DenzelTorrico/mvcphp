
<?php

    class Offices {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
        public function index(){
            $stmt = $this->pdo->query("select * from offices");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function create($city,$phone){
            $stmt = $this->pdo->prepare("INSERT INTO offices (city, phone) VALUES (?, ?)");          
            return $stmt->execute([$city, $phone]);;
        }
        public function delete($id){
            $stmt = $this->pdo->prepare("delete from offices where officeCode = ?");          
            return $stmt->execute([$id]);;
        }
    }

?>
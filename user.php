<?php
    class user
    {
        protected $name= "NULL";
        protected $email= "NULL";
        protected $tel= "NULL";
        protected $sex= "NULL";
        protected $pass= "NULL";
        protected $ras= "NULL";
        protected $ras_meth = "NULL";

        public function __construct($args)
        {
            $mass = explode(";", $args);
            $n = $mass[0];
            $e = $mass[1];
            $p = $mass[2];
            $t = $mass[3];
            $s = $mass[4];
            $r = $mass[5];
            $ra = $mass[6];
            //$n, $e, $p, $t = null, $s = null, $r = null
            if(user::name_test($n))
                $this->name = $n;
            else
                $this->name = "NULL";  
                
            if(user::mail_test($e))
                $this->email = $e;
            else
                $this->email = "NULL";

            if(user::tel_test($t))
                $this->tel = $t;
            else
                $this->tel = "NULL";

            if(user::sex_test($s))
                $this->sex = $s;
            else
                $this->sex = "NULL";                

            if(user::pass_test($p))
                $this->pass = $p;
            else
                $this->pass = "NULL";

            if(user::ras_test($r))
                $this->ras = $r;
            else
                $this->ras = "NULL";

            if(user::ras_meth_test($ra))
                $this->ras_meth = $ra;
            else
                $this->ras_meth = "NULL";    
        }

        public function getStr()
        {
            echo $this->name.";".$this->email.";".$this->pass.";".$this->tel.";".$this->sex.";".$this->ras.";".$this->ras_meth.";";
        }

        //Валидация
        public function name_test($name)
        {
            $options = array(
                            "options"=>array(
                                                'regexp'=>'/[A-z]{3}/'
                                            )
                            );
            if (filter_var($name, FILTER_VALIDATE_REGEXP, $options))
                return true;
            else
                return false;
        }
    
        public function tel_test($tel)
        {
            if (filter_var($tel, FILTER_VALIDATE_REGEXP, array("options"=>array('regexp'=>'/[0-9]{11}/'))))
                return true;
            else
                return false;
        }

        public function mail_test($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
                return true;
            else
                return false;
        }

        public function pass_test($pass)
        {
            $options = array(
                            "options"=>array(
                                                'regexp'=>'/[A-z0-9]{3}/'
                                            )
                            );
            if (filter_var($pass, FILTER_VALIDATE_REGEXP, $options))
                return true;
            else
                return false;       
        }

        public function Insert()
        {
            if(isset($this->name)&&isset($this->email)&&isset($this->pass))
            {
                $sql = "insert into log_tab(name, email, tel, sex, pass, ras) 
                            values(".$this->name.", ".$this->email.", ".$this->tel.", ".$this->sex.", ".$this->pass.", ".$this->ras.")";
                user::DBSql($sql);
            }
        }

        public function DBSql($sql)
        {
            $db = mysql_connect('localhost', 'Admin', 'Razer2');
            mysql_select_db('WEB', $db);            
            $res = mysql_query($sql);
            mysql_close();
            return $res;
        }

        public function sex_test($sex)
        {
            $options = array(
                            "options"=>array(
                                                'regexp'=>'/[M,F]{1}/'
                                            )
                            );
            if (filter_var($sex, FILTER_VALIDATE_REGEXP, $options))
                return true;
            else
                return false;
        }

        public function ras_test($ras)
        {
            $options = array(
                            "options"=>array(
                                                'regexp'=>'/[T, F]{1}/'
                                            )
                            );
            if (filter_var($ras, FILTER_VALIDATE_REGEXP, $options))
                return true;
            else
                return false;
        }

        public function ras_meth_test($ras)
        {

            if(($ras=="msg")||($ras=="mail"))
                return true;
            else
                return false;
        }


        //геттеры
        public function getName()
        {
            if(isset($this->name))
                return $this->name;
            else
                return "NULL";
        }        
        public function getEmail()
        {
            if(isset($this->email))
                return $this->email;
            else
                return "NULL";
        } 
        public function getTel()
        {
            if(isset($this->tel))
                return $this->tel;
            else
                return "NULL";
        } 
        public function getSex()
        {
            if(isset($this->sex))
                return $this->sex;
            else
                return "NULL";            
        } 
        public function getPass()
        {
            if(isset($this->pass))
                return $this->pass;
            else
                return "NULL";
        } 
        public function getRas()
        {
            if(isset($this->ras))
                return $this->ras;
            else
                return "NULL";
        }
        public function getRas_meth()
        {
            if(isset($this->ras_meth))
                return $this->ras_meth;
            else
                return "NULL";            
        }


        //сеттеры
        public function setName($name)
        {
            if(user::name_test($name))
                $this->name = $name;
        }
        public function setEmail($email)
        {
            if(user::mail_test($email))
                $this->email = $email;
        }  
        public function setTel($tel)
        {
            if(user::tel_test($tel))
                $this->tel = $tel;
        }  
        public function setSex($sex)
        {   
            if(user::sex_test($sex))
                $this->sex = $sex;
        }  
        public function setPass($pass)
        {
            if(user::pass_test($pass))
                $this->pass = $pass;
        }  
        public function setRas($ras)
        {
            if(user::ras_test($ras))
                $this->ras = $ras;
        }  
        public function setRas_Meth($ras)
        {
            if(user::ras_meth_test($ras))
                $this->ras_meth = $ras;
        }    
    }
?> 
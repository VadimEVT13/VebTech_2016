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

		public static function getForm()
		{
			return "<section><form name='test' action='t2.php' method='POST'>	
		
			<div class='box'>
				<label for='name' class='text'>Ввод логина: </label>
				<input type='text' name='name' id='name' required pattern='[A-z]{3,}' placeholder='Более 3 букв англ.' />
			</div>
			
			<div class='box'>
				<label for='mail' class='text'>Ввод почты: </label>
			    <input type='email' placeholder='Example@gmail.com' name='mail' id='mail' required pattern='^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$'/>
			</div>
			
			<div class='box'>
				<label for='tel' class='text'>Ввод телефона: </label> 
				<input type='tel' placeholder='89503335465' name='tel' id='tel' pattern='[0-9]{11}' maxlength='11' />
			</div>
			
			<div class='box'>
				<label for='male' class='text'>Мужской пол: </label>
				<input type='radio' name='sex' id='male' value='1'>
			</div>
			
			<div class='box'>
				<label for='female' class='text'>Женский пол: </label>
				<input type='radio' name='sex' id='female' value='2'>
			</div>
			
			<div class='box'>
				<label for='pass' class='text'>Пароль: </label>
				<input type='password' name='pass' id='pass' required pattern='[A-z0-9]{3,}'>
			</div>
			
			<div class='box'>
				<label for='check' class='text'>Включить рассылку? </label>
				<input type='checkbox' name='check' id='check'>
			</div>
			
			<select name='news' name='ras' id='ras'>
				<option value='mail'>Почта</option>
				<option value='msg'>Сообщение</option>
			</select>
			</section>
			
			<input type='submit' name='sub' value='Отправить данные'' class='last'>
			</form>";
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
<?php 
    class registerClass{
        private $uid, $fname , $lname, $email, $pwd, $phone, $city, $prov, $addr, $zip, $img, $ques1, $ans1, $ques2, $ans2;
        public function __construct($nfname,$nlname,$nemail,$npwd,$nphone,$ncity,$nprov,$naddr,$nzip,$nimg,$nques1,$nans1,$nques2,$nans2)
        {
            $this->fname=$nfname;
            $this->lname=$nlname;
            $this->email=$nemail;
            $this->pwd=$npwd;
            $this->phone=$nphone;
            $this->city=$ncity;
            $this->prov=$nprov;
            $this->addr=$naddr;
            $this->zip=$nzip;
            $this->img=$nimg;
            $this->ques1=$nques1;
            $this->ans1=$nans1;
            $this->ques2=$nques2;
            $this->ans2=$nans2;            
        }
        public function getUid()
        {
            return $this->uid;
        }
        public function setUid($nuid)
        {
            $this->uid = $nuid;
        }
        public function getFname()
        {
            return $this->fname;
        }
        public function setFname()
        {
            $this->fname = $nfname;
        }
        public function getLname()
        {
            return $this->lname;
        }
        public function setLname()
        {
            $this->lname = $nlname;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail()
        {
            $this->email = $nemail;
        }
        public function getPwd()
        {
            return $this->pwd;
        }
        public function setPwd()
        {
            $this->pwd = $npwd;
        }
        public function getPhone()
        {
            return $this->phone;
        }
        public function setPhone()
        {
            $this->phone = $nphone;
        }
        public function getCity()
        {
            return $this->city;
        }
        public function setCity()
        {
            $this->city = $ncity;
        }
        public function getProv()
        {
            return $this->prov;
        }
        public function setProv()
        {
            $this->prov = $nprov;
        }
        public function getAddr()
        {
            return $this->addr;
        }
        public function setAddr()
        {
            $this->addr = $naddr;
        }
        public function getZip()
        {
            return $this->zip;
        }
        public function setZip()
        {
            $this->zip = $nzip;
        }
        public function getImg()
        {
            return $this->img;
        }
        public function setImg()
        {
            $this->img = $nimg;
        }
        public function getQues1()
        {
            return $this->ques1;
        }
        public function setQues1()
        {
            $this->ques1 = $nques1;
        }
        public function getAns1()
        {
            return $this->ans1;
        }
        public function setAns1()
        {
            $this->ans1 = $nans1;
        }
        public function getQues2()
        {
            return $this->ques2;
        }
        public function setQues2()
        {
            $this->ques2 = $nques2;
        }
        public function getAns2()
        {
            return $this->ans2;
        }
        public function setAns2()
        {
            $this->ans2 = $nans2;
        }
    }

?>
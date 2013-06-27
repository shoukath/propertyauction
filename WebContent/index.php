<html>
	<body>Hi
		<?php
			include("../config/DBConfig.php");
			if (!class_exists('User')) {
			    include("../objects/user.php");
			}
			class MemberBiz
			{
			    public function loginUser($id, $password)
			    {
					$user = new User();
					$dbConfig = new DBConfig();
					$count = 0;
					
					$con = $dbConfig->connectDB();
					$query = ("SELECT * FROM USERS WHERE USERNAME'".$id."' AND PASSWORD_HASH='".$password."'");
					$result = mysql_query($query, $con);
					while($row = mysql_fetch_array($result)){
						$user->setId($row['id']);
						$user->setUserId($row['userid']);
						$user->setPassword($row['password']);
						$count++;
					}

					mysql_close($con);
					if($count==1){
						return $user;
					}else{
						return "";
					}
			    }
			}
			$member = new MemberBiz();
			$user = $member->loginUser("test", "pass");
			echo $user->getUserId();
		?>
	</body>
</html>


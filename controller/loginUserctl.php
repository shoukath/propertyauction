<?phpinclude("../business/member.php");class LoginUserCtl{    public function loginUser($id, $password)    {		$member = new MemberBiz();		$user = $member->loginUser($id, $password);		if($user!=null){			return $user;		}else{			return null;		}    }    	public function registerUser($user)    {		$member = new MemberBiz();		$user = $member->registerUser($user);				return $user;    }}?>
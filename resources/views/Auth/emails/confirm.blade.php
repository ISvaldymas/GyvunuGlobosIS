Click here to confirm your email adress({{ $user->email }}): 
 <a href="{{ $link = url('email/confirm', $token).'?email='.urlencode($user->email) }}"> 
 	{{ $link }}
 </a>

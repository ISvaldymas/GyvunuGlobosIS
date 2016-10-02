Click here to confirm your email adress({{ $email }}): 
 <a href="{{ $link = url('email/confirm', $token).'?email='.urlencode($email) }}"> 
 	{{ $link }}
 </a>

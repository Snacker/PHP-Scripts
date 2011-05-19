   <?php
   $check=$_POST['formcheck'];

   if ($check=="1")
    {

     if (empty($_POST['name']))
      {
       echo '<p><b>The following error occured:</b>:<br />You need a name</p>';
      }

     elseif (empty($_POST['email']))
      {
       echo '<p><b>The following error occured:</b>:<br />You need an e-mail</p>';
      }

     elseif (empty($_POST['subject']))
      {
       echo '<p><b>The following error occured:</b>:<br />You need a subject</p>';
      }

     elseif (empty($_POST['txt']))
      {
       echo '<p><b>The following error occured:</b>:<br />You need a message</p>';
      }

     else
      {
       $to=$_POST['emr'];
       $subject=$_POST['subject'];
       $message='A person has entered the contact form at your website.' . "\r\n" .
                'IP: ' . $_SERVER['REMOTE_ADDR'] . "\r\n" .
                'Email:' . $_POST['email'] . "\r\n" .
                'Name: ' . $_POST['name'] . "\r\n" .
                'Message:' . "\r\n" .
       $_POST['txt'];
       $headers='E-mail: ' . $_POST['email'];
       mail($to , $subject, $message, $headers);
       echo '<p>The e-mail has been sent!</p>';
       }

      }

     else
     {
	 ?>
     <p>
      <form action="<?php echo $PHP_SELF; ?>" method="post">
	   <input type="hidden" name="formcheck" value="1" />
	   <p>
        Receiver:<br />
	    <select class="input" name="emr">
	     <option value="example@example.com">Someone</option>
	    </select>
	   </p>
	   <p>
	    Name:<br />
	    <input class="input" type="text" name="name" />
	   </p>
	   <p>
	    Email:<br />
	    <input class="input" type="text" name="email" />
	   </p>
	   <p>
	    Subject:<br />
	    <input class="input" type="text" name="subject" />
	   </p>
	   <p>
	    Message:<br />
	    <textarea class="text" name="txt" rows="5"></textarea>
	   </p>
	   <p>
   	   <input class="submit" type="submit" value="Send" />
	  </form>
     </p>
	 <?php
	 }
   ?>
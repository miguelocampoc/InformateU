<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class Sendemail extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		
	}
public function sendEmail($email,$TokenActivate)
        {
         $this->load->model('queries');
         $this->email=$email;
         $this->TokenActivate=$TokenActivate;
         $row=$this->queries->GetFilasUser($email)->row();
         $iduser=$row->iduser;
         $url = 'http://localhost/InformateU/index.php/welcome/AccountActivated?&id='.$iduser.'&t='.$TokenActivate;
         $imagen= base_url();
                      $this->load->library('phpmailer_lib');
							$mail=$this->phpmailer_lib->load();
							$mail->isSMTP();
								$mail->Host = 'smtp.gmail.com';
								$mail->SMTPAuth = true;
								$mail->Username = 'infomigsed@gmail.com';
								$mail->Password = '@migsed123';
								$mail->SMTPSecure = 'tls';
								$mail->Port = 587;
					            $mail->setFrom('infomigsed@gmail.com', 'MIGSED');
							    $mail->addAddress($email);
							    $mail->Subject = 'MIGSED|Gracias por registrate, Verifica tu cuenta';
                                $mail->isHTML(true);
                                $mail->AddEmbeddedImage(base_url('images/migsed-logo.jpeg'), "my-attach",base_url('images/migsed-logo.jpeg'));

							    $mailContent = "<!DOCTYPE html>
                            <html>
                            <head>
                            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>

                                <title>Document</title>
                            </head>
                            <body >
                            <style>
                          
                           </style>
                           <div style='text-align:center; background-color:#E9EFEB; padding:5%;'>
                            <div style='text-align:center'>  <img width='100px' src='https://i.ibb.co/k4P5nXR/migsed-favicon.jpg'></img></div>
                                <p style='font-size:20px;'> 
                                Usted se ha registrado exitosamente en MIGSED verifica tu cuenta
                                </p>
                                 <br>
                                 <a href=".$url.">
                                       <button  type='button' style='text-decoration:none;
                                       font-weight:600;
                                       font-size:20px;
                                       color:#ffffff;
                                       padding-top:20px;
                                       padding-bottom:20px;
                                       padding-left:40px;
                                       padding-right:40px;
                                       background-color:#005BBB;' class='btn btn-primary'>
                                        Click aqui
                                        </button> 
                                </a> 
                            </div>   
                            </body>
                            </html>";
							$mail->Body = $mailContent;
							
							// Send email
							if(!$mail->send()){
								echo 'Message could not be sent.';
								echo 'Mailer Error: ' . $mail->ErrorInfo;
							}else{
								echo 'Message has been sent';
							}
					
					}
    public function mailupdatepassword($id){
      $this->load->model('gets');
      $this->id=$id;
      $email= $this->gets->getEmailByid($id);
                     $this->load->library('phpmailer_lib');
                           $mail=$this->phpmailer_lib->load();
                           $mail->isSMTP();
                               $mail->Host = 'smtp.gmail.com';
                               $mail->SMTPAuth = true;
                               $mail->Username = 'infomigsed@gmail.com';
                               $mail->Password = '@migsed123';
                               $mail->SMTPSecure = 'tls';
                               $mail->Port = 587;
                               $mail->setFrom('infomigsed@gmail.com', 'MIGSED');
                               $mail->addAddress($email);
                               $mail->Subject = 'MIGSED|Usted ha reestablecido su cuenta de MIGSED';
                               $mail->isHTML(true);
                               $mailContent = "<!DOCTYPE html>
                           <html>
                           <head>

                               <title>Document</title>
                           </head>
                           <body>
                           <div style='text-align:center; background-color:#E9EFEB; padding:5%;'>
                           <div style='text-align:center'>  <img width='100px' src='https://i.ibb.co/k4P5nXR/migsed-favicon.jpg'></img></div>

                               <p style='font-size:20px;'> 
                               Usted ha reestablecido correctamente su clave
                               </p>
                           </div>   

                           </body>
                           </html>";
                           $mail->Body = $mailContent;
                           
                           // Send email
                           if(!$mail->send()){
                               echo 'Message could not be sent.';
                               echo 'Mailer Error: ' . $mail->ErrorInfo;
                           }else{
                               echo 'Message has been sent';
                           }
    }
    
    public function  mailrecover($token,$email)
    {  

        $this->load->model('queries');
        $this->email=$email;
        $this->token=$token;
        $row=$this->queries->GetFilasUser($email)->row();
        $iduser=$row->iduser;
        $url = 'http://localhost/InformateU/index.php/welcome/recoverpass?&id='.$iduser.'&t='.$token;
                     $this->load->library('phpmailer_lib');
                           $mail=$this->phpmailer_lib->load();
                           $mail->isSMTP();
                               $mail->Host = 'smtp.gmail.com';
                               $mail->SMTPAuth = true;
                               $mail->Username = 'infomigsed@gmail.com';
                               $mail->Password = '@migsed123';
                               $mail->SMTPSecure = 'tls';
                               $mail->Port = 587;
                               $mail->setFrom('infomigsed@gmail.com', 'MIGSED');
                               $mail->addAddress($email);
                               $mail->Subject = 'MIGSED|Restablece tu clave';
                               $mail->isHTML(true);
                               
                             $mailContent = "<!DOCTYPE html>
                           <html>
                           <head>
                               <title>Document</title>
                           </head>
                           <body>
                           <div style='text-align:center; background-color:#E9EFEB; padding:5%;'>
                           <div style='text-align:center'>  <img width='100px' src='https://i.ibb.co/k4P5nXR/migsed-favicon.jpg'></img></div>

                               <p style='text-align:center; font-size:20px;' > 
                               Usted ha solicitada un cambio de contraseña en MIGSED,Por favor dar click en el boton para reestablecer en su clave
                               </p>
                                <br>
                                <a href=".$url.">
                                <button  type='button' style='text-decoration:none;
                                font-weight:600;
                                font-size:20px;
                                color:#ffffff;
                                padding-top:20px;
                                padding-bottom:20px;
                                padding-left:40px;
                                padding-right:40px;
                                background-color:#005BBB;' class='btn btn-primary'>
                                 Click aqui
                                 </button> 
                               </a> 
                            </div>
                           </body>
                           </html>";
                        
                         $mail->Body =$mailContent;
                           
                           // Send email
                           if(!$mail->send()){
                               echo 'Message could not be sent.';
                               echo 'Mailer Error: ' . $mail->ErrorInfo;
                           }else{
                               echo 'Message has been sent';
                           }
    }
     
    public function sendupdateemail($email,$token,$iduser){

        $this->email=$email;
        $this->token=$token;
        $this->iduser=$iduser;
        $url = 'http://localhost/InformateU/index.php/welcome/VerifiyEmail?&id='.$iduser.'&t='.$token;
                     $this->load->library('phpmailer_lib');
                           $mail=$this->phpmailer_lib->load();
                           $mail->isSMTP();
                               $mail->Host = 'smtp.gmail.com';
                               $mail->SMTPAuth = true;
                               $mail->Username = 'infomigsed@gmail.com';
                               $mail->Password = '@migsed123';
                               $mail->SMTPSecure = 'tls';
                               $mail->Port = 587;
                               $mail->setFrom('infomigsed@gmail.com', 'MIGSED');
                               $mail->addAddress($email);
                               $mail->Subject = 'MIGSED|Restablece tu email';
                               $mail->isHTML(true);
                               $mailContent = "<!DOCTYPE html>
                           <html>
                           <head>
                               <title>Document</title>
                           </head>
                           <body>
                           <style>
                            body{
                                background-color:#E9EFEB;
                            }
                           </style>
                           <div style='text-align:center; background-color:#E9EFEB; padding:5%;'>
                           <div style='text-align:center'>  <img width='100px' src='https://i.ibb.co/k4P5nXR/migsed-favicon.jpg'></img></div>

                               <p style='text-align:center' style='font-size:20px;'> 
                             Usted ha solicitado un cambio de correo electronico , pulsa click para reestablecer email.
                               </p>
                                <br>
                                <form action=".$url." method='POST'>
                                <input type='hidden' name='email' value=".$email.">
                                <button  type='submit' style='text-decoration:none;
                                font-weight:600;
                                font-size:20px;
                                color:#ffffff;
                                padding-top:20px;
                                padding-bottom:20px;
                                padding-left:40px;
                                padding-right:40px;
                                background-color:#005BBB;' class='btn btn-primary'>
                                 Click aqui
                                 </button> 
                               </form> 
                            </div>
                           </body>
                           </html>";
                           $mail->Body = $mailContent;
                           
                           // Send email
                           if(!$mail->send()){
                               echo 'Message could not be sent.';
                               echo 'Mailer Error: ' . $mail->ErrorInfo;
                           }else{
                               echo 'Message has been sent';
                           }
            
    }
    
 }
?>
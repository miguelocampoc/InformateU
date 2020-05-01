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
							    $mailContent = "<!DOCTYPE html>
                            <html>
                            <head>
                                <title>Document</title>
                            </head>
                            <body>
                            
                                <p> 
                                Usted se ha registrado exitosamente en MIGSED verifica tu cuenta
                                </p>
                                 <br>
                                 <a href=".$url.">
                                       <button>
                                        Click Me!
                                        </button> 
                                </a>    
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
                           
                               <p> 
                               Usted ha reestablecido correctamente su clave
                               </p>
                               
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
                           
                               <p> 
                               Usted ha solicitada un cambio de contraseña en MIGSED si  es usted por favor dar click en el link para reestablecer en su cuenta
                               </p>
                                <br>
                                <a href=".$url.">
                                      <button>
                                       Click Me!
                                       </button> 
                               </a>    
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
                           
                               <p> 
                             Usted ha solicitado un cambio de correo electronico , pulsa click para reestablecer email.
                               </p>
                                <br>
                                <form action=".$url." method='POST'>
                                <input type='hidden' name='email' value=".$email.">
                                      <button type='submit'>
                                       Click Me!
                                       </button> 
                               </form>   
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
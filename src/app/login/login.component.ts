import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
// import { AuthHttpService } from '../services/Auth/auth-http.service';
// import { MessageService } from '../services/messages/message.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  // FormLogin: FormGroup;
  constructor(
    // private formBuilder: FormBuilder,
    // private authHttpService: AuthHttpService,
    // private messageService: MessageService,
  ) {
    // this.FormLogin = this.newFormLogin();
  }

  ngOnInit(): void {

  }
  // newFormLogin(): FormGroup {
  //   return this.formBuilder.group({
  //     username: [null, [Validators.required]],
  //     password: [null, [Validators.required]],
  //     deviceName: ['MY PC'],
  //   });
  // }
  // get usernameField() {
  //   return this.FormLogin.controls['username'];
  // }
  // get passwordField() {
  //   return this.FormLogin.controls['password'];
  // }
  // onSubmit() {
  //   if (this.FormLogin.valid) {
  //     console.log("valio");
  //     this.Login();
  //   } else {
  //     console.log(" no valio");
  //     this.FormLogin.markAllAsTouched();
  //   }
  // }
  Login() {
  //   this.authHttpService.login(this.FormLogin.value).subscribe(
  //     Response => {
  //       localStorage.setItem('token',JSON.stringify(Response.token));
  //       this.messageService.success(Response);
  //     }, error => {
  //       this.messageService.error(error);
  //     }
  //   );
  }
}



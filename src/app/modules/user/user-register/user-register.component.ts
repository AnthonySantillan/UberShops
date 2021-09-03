import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { UserModel } from 'src/app/models';
import { MessageService } from 'src/app/services/messages/message.service';
import { UserHttpService } from 'src/app/services/user/user-http.service';


@Component({
  selector: 'app-user-register',
  templateUrl: './user-register.component.html',
  styleUrls: ['./user-register.component.css']
})
export class UserRegisterComponent implements OnInit {
  //registerform creation of a reactive form
  registerForm: FormGroup;
  //inhections of dependencies 
  constructor(private formBuilder: FormBuilder,
    private userHttpService:UserHttpService,
    private messageService:MessageService,
    private router:Router,) {
    this.registerForm = this.newRegisterForm();
  }
  newRegisterForm(): FormGroup {
    return this.formBuilder.group({
      id: [null],
      identificationType: ['email', [Validators.required]],
      username: [null, [Validators.required, Validators.maxLength(20)]],
      name: [null, [Validators.required, Validators.maxLength(100)]],
      lastname: [null, [Validators.required, Validators.maxLength(100)]],
      email: [null, [Validators.required, Validators.maxLength(100), Validators.email]],
      password: [null, [Validators.required, Validators.maxLength(16), Validators.minLength(8)]],
    });
  }
  ngOnInit(): void { }
 //guardar un registro
  onSubmit(user:UserModel) {
    if (this.registerForm.valid) {
      this.userHttpService.Store(user).subscribe(
        response => {
          this.router.navigate(['/login']);    
        },
        error => {
          this.messageService.error(error)
        }
      );
      
    }else{
      this.registerForm.markAllAsTouched();
    }
  }
  //cancelar
  onCancel() {
    console.log(this.registerForm.controls['password'].errors)
    this.router.navigate(['']);
  }
  
  //getters
  get idField() {
    return this.registerForm.controls['id'];
  }
  get identificationTypeField() {
    return this.registerForm.controls['identificationType'];
  }
  get userNameField() {
    return this.registerForm.controls['username'];
  }
  get nameField() {
    return this.registerForm.controls['name'];
  }
  get lastNameField() {
    return this.registerForm.controls['lastname'];
  }
  get emailField() {
    return this.registerForm.controls['email'];
  }
  get passwordField() {
    return this.registerForm.controls['password'];
  }

}

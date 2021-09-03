import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { UserAdministrationComponent } from './user-administration/user-administration.component';
import { UserListComponent } from './user-list/user-list.component';
import { UserRegisterComponent } from './user-register/user-register.component';

const routes: Routes = [
  {
    path:'',
    component:UserAdministrationComponent,
  },
  {
    path:'registration',
    component:UserRegisterComponent,
  },
  {
    path:'list',
    component:UserListComponent,
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UserRoutingModule { }

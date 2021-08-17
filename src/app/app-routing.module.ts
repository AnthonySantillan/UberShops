import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { MainComponent } from './main/main.component';
import { NotFoundComponent } from './not-found/not-found.component';


const routes: Routes = [
  {
    path:'',
    component:MainComponent,
      children:[
        {
          path:'clientes',
          loadChildren: () => import('./client/client.module').then(m=>m.ClientModule)
        }
      ]
  },
  {
    path:'login',
    component:LoginComponent
  },
  {
    path:'detail',
    loadChildren: () => import('./detail/detail.module').then(m=>m.DetailModule)
  },
  {
    path:'driver',
    loadChildren: () => import('./driver/driver.module').then(m=>m.DriverModule)
  },
  {
    path:'payment',
    loadChildren: () => import('./payment/payment.module').then(m=>m.PaymentModule)
  },
  {
    path:'product',
    loadChildren: () => import('./product/product.module').then(m=>m.ProductModule)
  },
  {
    path:'role',
    loadChildren: () => import('./role/role.module').then(m=>m.RoleModule)
  },
  {
    path:'seller',
    loadChildren: () => import('./seller/seller.module').then(m=>m.SellerModule)
  },
  {
    path:'travel',
    loadChildren: () => import('./travel/travel.module').then(m=>m.TravelModule)
  },
  {
    path:'user',
    loadChildren: () => import('./user/user.module').then(m=>m.UserModule)
  },
  {
    path:'vehicle',
    loadChildren: () => import('./vehicle/vehicle.module').then(m=>m.VehicleModule)
  },
  {
    path:'**',
    redirectTo:'/not-found'
  },
  {
    path:'not-found',
    component:NotFoundComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

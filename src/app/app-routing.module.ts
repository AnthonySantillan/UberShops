import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/login/login.component';
import { MainComponent } from './components/main/main.component';
import { NotFoundComponent } from './components/not-found/not-found.component';


const routes: Routes = [
  {
    path:'',
    component:MainComponent,
      children:[
        {
          path:'clientes',
          loadChildren: () => import('./modules/client/client.module').then(m=>m.ClientModule)
        }
      ]
  },
  {
    path:'login',
    component:LoginComponent
  },
  {
    path:'detail',
    loadChildren: () => import('./modules/detail/detail.module').then(m=>m.DetailModule)
  },
  {
    path:'shop',
    loadChildren: () => import('./modules/shop/shop.module').then(m=>m.ShopModule)
  },
  {
    path:'driver',
    loadChildren: () => import('./modules/driver/driver.module').then(m=>m.DriverModule)
  },
  {
    path:'payment',
    loadChildren: () => import('./modules/payment/payment.module').then(m=>m.PaymentModule)
  },
  {
    path:'product',
    loadChildren: () => import('./modules/product/product.module').then(m=>m.ProductModule)
  },
  {
    path:'role',
    loadChildren: () => import('./modules/role/role.module').then(m=>m.RoleModule)
  },
  {
    path:'seller',
    loadChildren: () => import('./modules/seller/seller.module').then(m=>m.SellerModule)
  },
  {
    path:'travel',
    loadChildren: () => import('./modules/travel/travel.module').then(m=>m.TravelModule)
  },
  {
    path:'user',
    loadChildren: () => import('./modules/user/user.module').then(m=>m.UserModule)
  },
  {
    path:'vehicle',
    loadChildren: () => import('./modules/vehicle/vehicle.module').then(m=>m.VehicleModule)
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

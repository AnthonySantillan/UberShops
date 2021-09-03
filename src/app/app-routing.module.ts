import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FrontComponent } from './components/front/front.component';
import { LoginComponent } from './components/login/login.component';
import { MainComponent } from './components/main/main.component';
import { NotFoundComponent } from './components/not-found/not-found.component';
import { ProductClientComponent } from './modules/product/product-client/product-client.component';
import { ShopClientComponent } from './modules/shop/shop-client/shop-client.component';


const routes: Routes = [
  {
    path: '',
    component: MainComponent,
    children: [
      {
        path: 'not-found',
        component: NotFoundComponent
      },
      {
        path: '',
        component: FrontComponent
      },
      {
        path: 'c-shops',
        component:ShopClientComponent
      },
      {
        path: 'c-products',
        component:ProductClientComponent
      },
    ]
  },
  {
    path: 'clients',
    loadChildren: () => import('./modules/client/client.module').then(m => m.ClientModule)
  },
  {
    path: 'details',
    loadChildren: () => import('./modules/detail/detail.module').then(m => m.DetailModule)
  },
  {
    path: 'shops',
    loadChildren: () => import('./modules/shop/shop.module').then(m => m.ShopModule)
  },
  {
    path: 'drivers',
    loadChildren: () => import('./modules/driver/driver.module').then(m => m.DriverModule)
  },
  {
    path: 'payments',
    loadChildren: () => import('./modules/payment/payment.module').then(m => m.PaymentModule)
  },
  {
    path: 'products',
    loadChildren: () => import('./modules/product/product.module').then(m => m.ProductModule)
  },
  {
    path: 'roles',
    loadChildren: () => import('./modules/role/role.module').then(m => m.RoleModule)
  },
  {
    path: 'sellers',
    loadChildren: () => import('./modules/seller/seller.module').then(m => m.SellerModule)
  },
  {
    path: 'travels',
    loadChildren: () => import('./modules/travel/travel.module').then(m => m.TravelModule)
  },
  {
    path: 'users',
    loadChildren: () => import('./modules/user/user.module').then(m => m.UserModule)
  },
  {
    path: 'vehicles',
    loadChildren: () => import('./modules/vehicle/vehicle.module').then(m => m.VehicleModule)
  },
  {
    path: 'login',
    component: LoginComponent
  },
  {
    path: '**',
    redirectTo: '/not-found'
  },
  {
    path: 'not-found',
    component: NotFoundComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

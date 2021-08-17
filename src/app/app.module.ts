// importaciones de angular
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
//importacion de componente y modulos
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ClientModule } from './client/client.module';
import { DetailModule } from './detail/detail.module';
import { DriverModule } from './driver/driver.module';
import { PaymentModule } from './payment/payment.module';
import { ProductModule } from './product/product.module';
import { RoleModule } from './role/role.module';
import { SellerModule } from './seller/seller.module';
import { ShopModule } from './shop/shop.module';
import { TravelModule } from './travel/travel.module';
import { UserModule } from './user/user.module';
import { VehicleModule } from './vehicle/vehicle.module';
import { NotFoundComponent } from './not-found/not-found.component';
import { UnderMaintenanceComponent } from './under-maintenance/under-maintenance.component';
import { AccessDeniedComponent } from './access-denied/access-denied.component';
import { MainComponent } from './main/main.component';
import { TopbarComponent } from './topbar/topbar.component';
//importacion primeng
import {MenubarModule} from 'primeng/menubar';
import {Fieldset, FieldsetModule} from 'primeng/fieldset';
import { FrontComponent } from './front/front.component';
import { LoginComponent } from './login/login.component';


@NgModule({
  declarations: [
    AppComponent,
    NotFoundComponent,
    UnderMaintenanceComponent,
    AccessDeniedComponent,
    MainComponent,
    TopbarComponent,
    FrontComponent,
    LoginComponent,
    
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    ClientModule,
    DetailModule,
    DriverModule,
    PaymentModule,
    ProductModule,
    RoleModule,
    SellerModule,
    ShopModule,
    TravelModule,
    UserModule,
    VehicleModule,
    MenubarModule,
    FieldsetModule,
    BrowserAnimationsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

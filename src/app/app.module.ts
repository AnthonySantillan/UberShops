// importaciones de angular
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
//importacion de componente y modulos
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ClientModule } from './modules/client/client.module';
import { DetailModule } from './modules/detail/detail.module';
import { DriverModule } from './modules/driver/driver.module';
import { PaymentModule } from './modules/payment/payment.module';
import { ProductModule } from './modules/product/product.module';
import { RoleModule } from './modules/role/role.module';
import { SellerModule } from './modules/seller/seller.module';
import { ShopModule } from './modules/shop/shop.module';
import { TravelModule } from './modules/travel/travel.module';
import { UserModule } from './modules/user/user.module';
import { VehicleModule } from './modules/vehicle/vehicle.module';
import { NotFoundComponent } from './components/not-found/not-found.component';
import { UnderMaintenanceComponent } from './components/under-maintenance/under-maintenance.component';
import { AccessDeniedComponent } from './components/access-denied/access-denied.component';
import { MainComponent } from './modules/main/main.component';
import { TopbarComponent } from './components/topbar/topbar.component';
//importacion primeng
import {MenubarModule} from 'primeng/menubar';
import {Fieldset, FieldsetModule} from 'primeng/fieldset';
import { FrontComponent } from './components/front/front.component';
import { LoginComponent } from './components/login/login.component';
import {  HttpClientModule } from '@angular/common/http';


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
    HttpClientModule,
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

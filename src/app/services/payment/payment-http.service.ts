import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { PaymentModel } from 'src/app/models/payment.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class PaymentHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<PaymentModel>{
    const url:string=`${this.API_URL}/payments`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/payments/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:PaymentModel) { 
    const url:string=`${this.API_URL}/payments/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:PaymentModel) { 
    const url:string=`${this.API_URL}/payments`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/payments/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/payments`;
    return this.httpClient.get(url);
   }
}

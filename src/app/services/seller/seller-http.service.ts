import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { SellerModel } from 'src/app/models/seller.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class SellerHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<SellerModel>{
    const url:string=`${this.API_URL}/sellers`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/sellers/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:SellerModel) { 
    const url:string=`${this.API_URL}/sellers/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:SellerModel) { 
    const url:string=`${this.API_URL}/sellers`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/sellers/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/sellers`;
    return this.httpClient.get(url);
   }
}

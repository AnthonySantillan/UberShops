import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ShopModel } from 'src/app/models/shop.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ShopHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ShopModel>{
    const url:string=`${this.API_URL}/shops`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/shops/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:ShopModel) { 
    const url:string=`${this.API_URL}/shops/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:ShopModel) { 
    const url:string=`${this.API_URL}/shops`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/shops/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/shops`;
    return this.httpClient.get(url);
   }
}

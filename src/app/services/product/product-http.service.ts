import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ProductModel } from 'src/app/models/product.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ProductHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ProductModel>{
    const url:string=`${this.API_URL}/product`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/product/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:ProductModel) { 
    const url:string=`${this.API_URL}/product/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:ProductModel) { 
    const url:string=`${this.API_URL}/product`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/product/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/product`;
    return this.httpClient.get(url);
   }
}

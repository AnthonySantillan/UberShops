import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { DetailModel } from 'src/app/models/detail.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class DetailHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<DetailModel>{
    const url:string=`${this.API_URL}/details`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/details/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:DetailModel) { 
    const url:string=`${this.API_URL}/details/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:DetailModel) { 
    const url:string=`${this.API_URL}/details`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/details/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/details`;
    return this.httpClient.get(url);
   }
}

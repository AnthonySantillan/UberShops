import { Injectable } from '@angular/core';
import { ServerResponse } from 'http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http'
import { ClientModel } from 'src/app/models/client.model';
@Injectable({
  providedIn: 'root'
})
export class ClientHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ClientModel>{
    const url:string=`${this.API_URL}/clients`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/clients/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:ClientModel) { 
    const url:string=`${this.API_URL}/clients/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:ClientModel) { 
    const url:string=`${this.API_URL}/clients`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/clients/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/clients`;
    return this.httpClient.get(url);
   }
}

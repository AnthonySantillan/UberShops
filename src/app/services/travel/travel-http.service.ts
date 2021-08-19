import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { TraveModel } from 'src/app/models/travel.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class TravelHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<TraveModel>{
    const url:string=`${this.API_URL}/travels`;
    return this.httpClient.get(url);
  }
  getOne(id:number) {
    const url:string=`${this.API_URL}/travels/${id}`;
    return this.httpClient.get(url);
   }
  Update(id:number,shop:TraveModel) { 
    const url:string=`${this.API_URL}/travels/${id}`;
    return this.httpClient.put(url,shop);
  }
  Store(shop:TraveModel) { 
    const url:string=`${this.API_URL}/travels`;
    return this.httpClient.post(url,shop);
  }
  destroy(id:number) { 
    const url:string=`${this.API_URL}/travels/${id}`;
    return this.httpClient.delete(url);
  }
  destroys() {
    const url:string=`${this.API_URL}/travels`;
    return this.httpClient.get(url);
   }
}

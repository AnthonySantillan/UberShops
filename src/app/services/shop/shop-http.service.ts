import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ShopModel } from 'src/app/models/shop.model';
import { environment } from 'src/environments/environment';
import { ServerResponse } from 'src/app/models/server-response';
import { catchError, map } from 'rxjs/operators';
import { Handler } from 'src/app/exceptions/handler';
@Injectable({
  providedIn: 'root'
})
export class ShopHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/shops`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number|undefined):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/shops/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );;
   }
  Update(id:number|undefined,shop:ShopModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/shops/${id}`;
    return this.httpClient.put<ServerResponse>(url,shop)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );;
  }
  Store(shop:ShopModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/shops`;
    return this.httpClient.post<ServerResponse>(url,shop)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number|undefined):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/shops/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(ids:(number |undefined)[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/shop/destroys`;
    return this.httpClient.patch<ServerResponse>(url,{ids})
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

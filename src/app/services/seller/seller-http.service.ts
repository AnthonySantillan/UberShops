import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ServerResponse } from 'src/app/models/server-response'; 
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { Handler } from 'src/app/exceptions/handler';
import { SellerModel } from 'src/app/models/seller.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class SellerHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/sellers`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/sellers/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
  Update(id:number,seller:SellerModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/sellers/${id}`;
    return this.httpClient.put<ServerResponse>(url,seller)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  Store(seller:SellerModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/sellers`;
    return this.httpClient.post<ServerResponse>(url,seller)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/sellers/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(sellers:SellerModel[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/sellers`;
    return this.httpClient.patch<ServerResponse>(url,sellers)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

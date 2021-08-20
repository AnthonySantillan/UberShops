import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ServerResponse } from 'src/app/models/server-response'; 
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { Handler } from 'src/app/exceptions/handler';
import { PaymentModel } from 'src/app/models/payment.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class PaymentHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/payments`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number|undefined):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/payments/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
  Update(id:number|undefined,payment:PaymentModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/payments/${id}`;
    return this.httpClient.put<ServerResponse>(url,payment)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  Store(payment:PaymentModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/payments`;
    return this.httpClient.post<ServerResponse>(url,payment)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number|undefined):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/payments/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(ids:(number|undefined)[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/payments`;
    return this.httpClient.patch<ServerResponse>(url,{ids})
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

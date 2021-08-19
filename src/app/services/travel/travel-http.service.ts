import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { Handler } from 'src/app/exceptions/handler';
import { ServerResponse } from 'src/app/models/server-response';
import { TraveModel } from 'src/app/models/travel.model';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class TravelHttpService {
  API_URL: string = environment.API_URL;
  constructor(private httpClient: HttpClient) { }
  //metodos para recuperar datos del  backend
  getAll():Observable<ServerResponse>{
    const url:string=`${this.API_URL}/travels`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  getOne(id:number):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/travels/${id}`;
    return this.httpClient.get<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
  Update(id:number,travel:TraveModel) { 
    const url:string=`${this.API_URL}/travels/${id}`;
    return this.httpClient.put<ServerResponse>(url,travel)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  Store(travel:TraveModel):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/travels`;
    return this.httpClient.post<ServerResponse>(url,travel)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroy(id:number):Observable<ServerResponse> { 
    const url:string=`${this.API_URL}/travels/${id}`;
    return this.httpClient.delete<ServerResponse>(url)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
  }
  destroys(travels:TraveModel[]):Observable<ServerResponse> {
    const url:string=`${this.API_URL}/travels`;
    return this.httpClient.patch<ServerResponse>(url,travels)
    .pipe(
      map(response=>response),
      catchError(Handler.render)
    );
   }
}

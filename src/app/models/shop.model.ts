import { ProductModel,SellerModel } from "./index";
import {  } from "./seller.model";

export interface ShopModel{
    id?:number;
    seller?:SellerModel;
    product?:ProductModel;
    name?:string;
    code?:number;
    direction?:string;
}
interface RealData{
    id?:number;
    seller?:SellerModel;
    product?:ProductModel;
    name?:string;
    code?:number;
    direction?:string;
}
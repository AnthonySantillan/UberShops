import { ProductModel } from "./product.model";
import { SellerModel } from "./seller.model";

export interface ShopModel{
    id?:number;
    seller?:SellerModel;
    product?:ProductModel;
    name?:number;
    code?:number;
    
}
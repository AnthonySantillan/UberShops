import { ProductModel,SellerModel } from "./index";
export interface ShopModel{
    id?:number;
    seller?:SellerModel;
    product?:ProductModel;
    name?:string;
    code?:number;
    direction?:string;
}

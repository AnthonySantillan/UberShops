import { ClientModel } from "./client.model";
import { DetailModel } from "./detail.model";
import { DriverModel } from "./driver.model";
import { ShopModel } from "./shop.model";

export interface TraveModel{
    id?:number;
    driver?:DriverModel;
    client?:ClientModel;
    shop?:ShopModel;
    detail?:DetailModel;
}
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { UsuarioComponent } from './modules/configuraciones/component/usuario/usuario.component';
import { AppComponent } from './app.component';

const routes: Routes = [
  
   // { path: 'seguridad', component: NavbarComponent, children: [
   //   { path: 'usuario', component: UsuarioComponent }, // Asegúrate de tener estos componentes creados
    //  { path: 'grupo', component: GrupoComponent }
    //]},
    //{ path: '', redirectTo: '/seguridad', pathMatch: 'full' }, // Ruta por defecto
    
    {path: '', component:AppComponent},
    {path: 'usuarios', loadChildren: () =>  import('./modules/configuraciones/component/usuario/usuario.component').then (m => m.UsuarioComponent)},

   { path: '**', component: AppComponent } // Ruta para manejar rutas no encontradas
   
    // { path: 'configuraciones/usuario', component: UsuarioComponent },
    // { path: 'configuraciones/grupo', component: GrupoComponent },
    // { path: '', redirectTo: '/configuraciones/usuario', pathMatch: 'full' } // Ruta por defecto


  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

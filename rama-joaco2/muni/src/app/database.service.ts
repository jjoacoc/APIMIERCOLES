import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class DatabaseService {
  private apiUrl = 'http://localhost/apiMiercoles/public/index.php';

  constructor(private http: HttpClient) {}

  alta(usuarioData: any): Observable<any> {
    console.log(usuarioData);
    return this.http.post(`${this.apiUrl}`, usuarioData);
  }

  recuperar(): Observable<any> {
    return this.http.get(`${this.apiUrl}`);
  }

  baja(id: number): Observable<any> {
    console.log(id);
    return this.http.delete(`${this.apiUrl}?id=${id}`);
  }

  // Nuevo método para modificar un usuario
  modificar(usuario: any): Observable<any> {
    return this.http.put(`${this.apiUrl}?id=${usuario.id}`, usuario);
  }
}

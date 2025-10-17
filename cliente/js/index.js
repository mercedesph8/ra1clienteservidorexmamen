document.addEventListener('DOMContentLoaded', async () => {
  const contenedor = document.getElementById('nuevo container text-center');
  const productos = await obtenerProductos(); 

let i =0;
 for (const p of productos) {
        if (i >= 3) break;

    const card = document.createElement('div');
    card.className = "col-md-4";
    card.innerHTML = `
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">

          <h5 class="card-title">${p.nombre}</h5>
          <p class="card-text">${p.descripcion}</p>
          <p class="fw-bold">${p.precio.toFixed(2)} €</p>
          <a href="producto.html?id=${p.id}" class="btn btn-primary">Ver detalle</a>
          <p class="nuevo-campo">${p.categorial}</p>
          <img src="${p.img}" class="imagen-nueva">
        </div>
      </div>
    `;
    contenedor.appendChild(card);

    i++;
 };
 });
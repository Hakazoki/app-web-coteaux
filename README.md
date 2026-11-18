# app-web-coteaux


## **Install**
```bash
git clone git@github.com:Hakazoki/app-web-coteaux.git
cd app-web-coteaux
docker compose build --pull
docker compose up --wait
```

## **Ports**

| Service | Port par défaut | Variable |
|---|---|---|
| Application | 80 / 443 → https://localhost | `HTTP_PORT`, `HTTPS_PORT`, `HTTP3_PORT` |
| PostgreSQL (client SQL)  | 5433, accessible via un client | `DATABASE_PORT` |
| Mailpit | 8025 → http://localhost:8025 | `MAILPIT_PORT` |

Si un port est déjà utilisé :

- Préfixez la commande avec les variables souhaités :
  `HTTP_PORT=8000 HTTPS_PORT=4443 HTTP3_PORT=4443 DATABASE_PORT=5434 docker compose up --wait`

> `HTTPS_PORT` et `HTTP3_PORT` doivent avoir la même valeur.
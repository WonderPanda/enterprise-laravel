## Enterprise Laravel

### Should I Use This for My Next Enterprise Project™?
No. Not yet. I can see the irony. This is still a work in progress

### Instructions
- `composer require wonderpanda/enterprise-laravel`
- `php artisan vendor:publish --provider=EnterpriseLaravel\EnvironmentProvider`

### Objectives
- [x] Simple AF. Just run `docker-compose up`
- [x] Just use Docker. Works anywhere that Docker is installed, we love Windows developers too
- [ ] No PHP installation required on the developer machine. This includes Composer and PHP Artisan CLI interactions. No more "works on my machine" syndrome
- [ ] Simple Debugging. It shouldn't take hours to be able to debug your source code
- [ ] Dev on the same containers that you would deploy to production. Only enable dev required functionality through Configuration instead of bloated, custom Dockerfiles
- [ ] Testing as a first class citizen. Use a real database (just like you would in production)
- [x] Sane defaults for NGINX and FPM. Full customizability through external config files
- [ ] Automatic code formatting on Git Hooks out of the box. No more PR fights over code formatting
- [ ] Small Alpine based Containers 

### Design Decisions
#### It's Just Docker
After looking at the different options in the broader ecosystems for a complete solution to maintaining both developer environments and production deployments for PHP based applications, the best I've seen so far appears to be Vessel. Huge shoutout to the team who put this project together because there are definitely parts of the work they've done that I'm drawing inspiration from.

One major difference from the Vessel project is the lack of a bash script wrapping the majority of the interactions with docker. This project fully embraces Docker and believes that it is important to understand how to interact with it directly. However, it is extremely easy to defer repetitive tasks to a a more reusable format like a Makefile, JS, Bash or any other scripting platform.

#### Separate Containers for NGINX and FPM
- Using Supervisor violates the ideas behind things like health checks for modern (eg K8s) platforms that expect to fully handle orchestration. An unhealthy container could be "kept-alive" by Supervisor continuing to restart a process that is unhealthy instead of allowing a more appropriate Orchestrator to take care of this
- Can load balance multiple FPM containers behind a single NGINX container to separate independent workloads at scale
- Can more easily leverage community vetted core images for NGINX an PHP-FPM which both allow for multiple different Linux based environments without having to build and adopt a custom image


## License
This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

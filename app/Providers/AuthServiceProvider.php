<?php

namespace App\Providers;
use App\Models\Prenda;
use App\Models\User;
use App\Policies\PrendaPolicy;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Prenda::class => PrendaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
		Gate::define('admin-empleados', function (User $user) {  //solo el id 1 puede agregar empleados
			return $user->id === 1;
		});

        //
    }

	/**
	 * The policy mappings for the application.
	 * 
	 * @return array<class-string, class-string>
	 */
	public function getPolicies() {
		return $this->policies;
	}
	
	/**
	 * The policy mappings for the application.
	 * 
	 * @param array<class-string, class-string> $policies The policy mappings for the application.
	 * @return self
	 */
	public function setPolicies($policies): self {
		$this->policies = $policies;
		return $this;
	}
}

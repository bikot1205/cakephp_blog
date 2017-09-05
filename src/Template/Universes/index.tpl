<div class="row">
  <div class="col-md-12">
    <h1>{__('Universes')}</h1>
    <p><a href="/universes/add">Add Article</a></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">{$this->Paginator->sort('id')}</th>
                <th scope="col">{$this->Paginator->sort('name')}</th>
                <th scope="col">{$this->Paginator->sort('characteristics')}</th>
                <th scope="col">{$this->Paginator->sort('created_at')}</th>
                <th scope="col">{$this->Paginator->sort('updated_at')}</th>
                <th scope="col" class="actions">{__('Actions')}</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$universes item=universe name=universes}
            <?php foreach ($universes as $universe): ?>
            <tr>
                <td>{$universe.id}</td>
                <td>{$universe.name|escape}</td>
                <td>{$universe->characteristics|escape}</td>
                <td>{$universe->created_at|escape}</td>
                <td>{$universe->updated_at|escape}</td>
                <td class="actions">
                    <a href="/universes/view/{$universe.id}">View</a>
                    <a href="/universes/edit/{$universe.id}">Edit</a>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
  </div>  
</div>

<div class="col">
    <div class="collapse" id="filter-body">
        <form role="form" id="filter-form" method="get" name="filterForm" class="filter-card mt-5 mb-3 card-body">
            <div class="filter-card-content row">
                <div class="order-by-group col-6">
                    <fieldset>
                        <legend>Filter by</legend>
                        <div class="filter-position">
                            <input id="hasAnswer" class="filter-by-checkbox"   type="checkbox" name="filterId" value=""/>
                            <label>Has answer</label>
                        </div>
                        <div class="filter-position">
                            <input id="hasVotedAnswer" class="filter-by-checkbox"  type="checkbox"  name="filterId" value=""/>
                            <label>Has voted answer</label>
                        </div>
                        <div class="filter-position">
                            <input id="orderByVotes" class="filter-by-checkbox" type="checkbox"  name="filterId" value="order_by_votes"/>
                            <label>Order by votes</label>
                        </div>
                    </fieldset>
                </div>
                <div class="filter-sorted-group col-6 ">
                    <fieldset>
                        <legend>Sorted by</legend>
                        <div class="filter-position">
                            <label>Order by: </label>
                            <select id="orderBy">
                                <option value="updated_at">updated at</option>
                                <option value="created_at">created at</option>
                            </select>
                        </div>

                        <div class="filter-position">
                            <label>Order direction: </label>
                            <select id="orderDirection">
                                <option value="desc">DESC</option>
                                <option value="asc">ASC</option>
                            </select>
                        </div>

                    </fieldset>
                </div>
            </div>
            <div class="row justify-content-between ml-1 mr-5">
                <a href="#"  type="submit" id="filter-form-submit" class="btn btn-primary">Apply filter</a>
                <a href="#" id="filter-form-cancel" class="card-link">Cancel</a>
            </div>
        </form>
    </div>
</div>

